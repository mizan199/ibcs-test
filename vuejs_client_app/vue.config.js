module.exports = {
 
  devServer: {
    Headers:{"Access-Control-Allow-Origin": "*"},
    proxy: 'http://localhost:8000/',
    }
}
