const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const autoprefixer = require('autoprefixer');

module.exports = {
  mode: 'development', // Cambia a 'development' para debugging si es necesario
  entry: {
    utilities: '/src/js/utilities.js', // Asegúrate de que la ruta es correcta
    main: {
      import: [
        '/src/js/lazy-load.js',
        '/src/js/social-events.js',
        '/src/js/ui/chroma-scroll-anchors.js',
        '/src/js/state-management/store.js',
        '/src/js/_INDEX.js',
      ],
      dependOn: 'utilities' // Asegura que 'utilities.js' se cargue primero
    },
    //form: '/src/js/form-action.js', // Cambia a la ubicación correcta si es necesario
    slider: '/src/js/slider/slider.js',
    gallery: {
      import: [
        'masonry-layout',
        'imagesloaded',
        'blueimp-gallery',
        '/src/js/gallery-initial.js',
      ],
      dependOn: 'utilities'
    },
    infinite: '/src/js/ui/chroma-infinite.js',
    disqus: '/src/js/disqus.js',
    ads: [
      '/src/ad-loaders/ad-appender.js',
      '/src/ad-loaders/rev-content.js'
    ],
    // SASS/CSS entries
    mainCss: './src/sass/_INDEX.scss',
    shareFix: './src/sass/social-share-fix/share-fix.sass',
    wallCss: './src/wallsass/wallpaper.scss',
    adminTheme: "./src/sass/colors.scss",
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist/js'),
    clean: true, // Esto reemplaza el uso de CleanWebpackPlugin
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-transform-runtime']
          }
        }
      },
      {
        test: /\.(scss|sass)$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [autoprefixer()]
              }
            }
          },
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/[name].css',
    }),
  ],
  optimization: {
    minimize: false,
    minimizer: [
      new TerserPlugin({
        terserOptions: {
          keep_fnames: true, // Evitar que Terser cambie los nombres de las funciones
          keep_classnames: true // Similar, pero para nombres de clases
        }
      }),
      new CssMinimizerPlugin() // Usado para la minificación de CSS
    ],
  },
  watch: true
};
