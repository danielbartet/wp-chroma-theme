FROM ubuntu:jammy
RUN apt-get update -y && \
    apt install curl -y && \
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash && \
    . ~/.bashrc && \
    nvm install 12 && nvm use 12 && npm install --global gulp-cli && \
    apt install python2 cmake build-essential -y && mkdir /app && \
    echo 'alias python=python2' >> ~/.bashrc
WORKDIR /app