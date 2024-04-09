(function() {
  const heart = document.querySelector('.post-like .heart'),
// Retrieve post ID from data attribute
  postId = (typeof postVar != 'undefined') ? postVar : null;
  if (postId === null || !doesExist(heart))
    return
  //send post rquest to update
  fetch(ajaxPage.url, {
    method: 'post',
    mode: "cors",
    cache: "no-cache",
    credentials: "same-origin",
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body:
      `action=post_like_update&post_id=${postId}`
  })
  .then(response => {
    console.log(response)
    return response.text().then( text => {
      heart.classList.add('voted')
      console.log(text)
      let userLiked = text.split(":")
      document.querySelector('.post-like .count').innerText = userLiked[0] + ' Likes'
      if (userLiked[1] == 'true0') {
        heart.innerHTML = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve" width="18px" height="18px"><path style="fill:#ec2e44;" d="M24.85,10.126c2.018-4.783,6.628-8.125,11.99-8.125c7.223,0,12.425,6.179,13.079,13.543 c0,0,0.353,1.828-0.424,5.119c-1.058,4.482-3.545,8.464-6.898,11.503L24.85,48L7.402,32.165c-3.353-3.038-5.84-7.021-6.898-11.503 c-0.777-3.291-0.424-5.119-0.424-5.119C0.734,8.179,5.936,2,13.159,2C18.522,2,22.832,5.343,24.85,10.126z"/></svg>'
      }
    })
  })
  .then(response => console.log('Success: ', response.status))
  .catch(error => console.error('Error: ', error))

  heart.addEventListener('click', (ev) => {
    fetch(ajaxPage.url, {
      method: 'post',
      mode: "cors",
      cache: "no-cache",
      credentials: "same-origin",
      headers: {
        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
      },
      body:
      `action=post-like&nonce=${ajaxPage.nonce}&post_like=&post_id=${postId}`
    })
    .then(response => {
      return response.text().then( text => {
        if (text != 'already') {
          heart.classList.add('voted')
          document.querySelector('.post-like .count').innerText = count + ' Likes'
          heart.innerHTML = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve" width="18px" height="18px"><path style="fill:#ec2e44;" d="M24.85,10.126c2.018-4.783,6.628-8.125,11.99-8.125c7.223,0,12.425,6.179,13.079,13.543 c0,0,0.353,1.828-0.424,5.119c-1.058,4.482-3.545,8.464-6.898,11.503L24.85,48L7.402,32.165c-3.353-3.038-5.84-7.021-6.898-11.503 c-0.777-3.291-0.424-5.119-0.424-5.119C0.734,8.179,5.936,2,13.159,2C18.522,2,22.832,5.343,24.85,10.126z"/></svg>'
        }
      })
    })
    .then(response => console.log('Success: ', response.status))
    .catch(error => console.error('Error: ', error))
  })
})()
