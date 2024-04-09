//init state
var initState = {commentStatus: false, commentAnimate: false}
//store
var store = Redux.createStore(commentsTracker, initState)
function render() {
  console.log(store.getState().commentStatus)
  var renderState = store.getState()
}
store.subscribe(render)

//reducer
function commentsTracker(currentState, action) {
  var nextState = {
    commentStatus: currentState.commentStatus
  }
  switch (action.type) {
    case 'commentOn':
      nextState.commentStatus = true
      return nextState
      break;
    default:
      return currentState
  }
}
//action handlers
// [].forEach.call(document.querySelectorAll('button[data-share="comment"]'), (e) => {
//   e.addEventListener('click', (ev) => {
//     store.dispatch({
//       type : 'commentOn'
//     })
//   })
// })
