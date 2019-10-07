module.exports = {
  indexPath: 'app.html',
  assetsDir: 'vue-dist',
  outputDir: 'vue/dist',
  devServer: {
    proxy: {
      '/api': {
        target: 'http://0.0.0.0:8000',
      },
    },
  },
};
