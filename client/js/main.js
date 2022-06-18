(function() {
  const axios = require('axios').default;

  axios.get('https://drupalmercure.lndo.site/jsonapi/node/article')
    .then(function (response) {
      const productsElement = document.querySelector('#products')
      console.log(response.data.data)
      response.data.data.forEach(function(article) {
        var tag = document.createElement("li")
        var text = document.createTextNode(article.attributes.title)
        tag.appendChild(text)
        productsElement.appendChild(tag)
      })
    })
}());
