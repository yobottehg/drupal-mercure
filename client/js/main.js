(function() {
  const axios = require('axios').default;

  const mercureBaseUrl = 'http://hub.drupalmercure.lndo.site/.well-known/mercure';
  const apiBaseUrl = 'https://drupalmercure.lndo.site'
  const mercureUrl = new URL(mercureBaseUrl);
  const productsElement = document.querySelector('#products')
  mercureUrl.searchParams.append('topic', apiBaseUrl + '/jsonapi/node/article');

  axios.get(apiBaseUrl + '/jsonapi/node/article')
    .then(function (response) {
      console.log(response.data.data)
      response.data.data.forEach(function(article) {
        // @TODO move into function
        const tag = document.createElement("li")
        const text = document.createTextNode(article.attributes.title)
        tag.appendChild(text)
        tag.setAttribute('id', article.id)
        productsElement.appendChild(tag)
        mercureUrl.searchParams.append('topic', apiBaseUrl + '/jsonapi/node/article/' + article.id);
      })
      const eventSource = new EventSource(mercureUrl);
      // @TODO move into function
      eventSource.onmessage = function(event) {
        const responseData = JSON.parse(event.data)
        const id = responseData.id
        var title = ''
        var text
        switch (responseData.action) {
          case "delete":
            document.getElementById(id).remove();
            break;
          case "edit":
            title = responseData.data.data.attributes.title
            text = document.createTextNode(title)
            document.getElementById(id).replaceChildren(text)
            break;
          case "create":
            title = responseData.data.data.attributes.title
            text = document.createTextNode(title)
            const tag = document.createElement("li")
            tag.appendChild(text)
            tag.setAttribute('id', id)
            productsElement.appendChild(tag)
            // @TODO new EventStream
            break;
        }

      }
    })

}());
