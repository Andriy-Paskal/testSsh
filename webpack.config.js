const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const autoprefixer = require('autoprefixer');

module.exports = (env) => {
   return {
       mode: env.mode ?? "development",
       entry: {
           all: path.resolve(__dirname, 'src/js', 'main.js'),
           single: path.resolve(__dirname, 'src/js', 'single.js')
       },
       output: {
           filename: '[name].js',
           path: path.resolve(__dirname, 'build','assets', 'js'),
           clean: true,
       },
       module: {
           rules: [
               {
                   test: /\.scss$/,
                   use: [
                       MiniCssExtractPlugin.loader,
                       {
                           loader: 'css-loader',
                           options: { sourceMap: true }
                       },
                       {
                           loader: 'postcss-loader',
                           options: {
                               postcssOptions: {
                                   plugins: [autoprefixer()]
                               },
                               sourceMap: true
                           }
                       },
                       {
                           loader: 'sass-loader',
                           options: { sourceMap: true }
                       }
                   ]
               }
           ]
       },
       optimization: {
           minimizer: ['...', new CssMinimizerPlugin()],
       },
       plugins: [
           new MiniCssExtractPlugin({
               filename: '../css/[name].css'
           })
       ],
       resolve: {
           extensions: ['.js', '.scss']
       },
       devServer: {
           static: {
               directory: path.resolve(__dirname, 'build'),
           },
           compress: true,
           port: 8080,
           open: true,
           hot: true,
           watchFiles: ['src/**/*', 'public/**/*']
       }
   }
}