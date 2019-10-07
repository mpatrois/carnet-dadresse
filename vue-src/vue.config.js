/* eslint-disable no-param-reassign */
module.exports = {
  indexPath: 'app.html',
  assetsDir: 'vue-dist',
  outputDir: '../public/static',
  publicPath: '/static/',
  devServer: {
    proxy: {
      '/api': {
        target: 'http://0.0.0.0:8000',
      },
    },
  },
};
