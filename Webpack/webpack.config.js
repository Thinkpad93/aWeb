const path = require("path");
const webpack = require("webpack");
// 压缩CSS插件
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: "production",
  devtool: "none",
  entry: {
    main: "./src/index.js"
  },
  output: {
    filename: "bundle.js",
    path: path.resolve(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        //排除node_modules 目录下的文件
        exclude: /node_modules/,
        use: [
          {
            loader: "babel-loader",
            options: {
              //因为新版本的babel更新 原配置修改如下
              presets: ["@babel/preset-env"],
              plugins: ["@babel/plugin-transform-runtime"]
            }
          }
        ]
      },
      {
        test: /\.(css|scss|sass)$/,
        use: ["style-loader", "css-loader", "postcss-loader"]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/[name].css"
    })
  ]
};
