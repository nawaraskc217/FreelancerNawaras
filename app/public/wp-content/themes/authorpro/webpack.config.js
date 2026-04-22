const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
    ...defaultConfig,
    // যদি ভবিষ্যতে আপনি এনট্রি পয়েন্ট চেঞ্জ করতে চান, এখানে করতে পারবেন।
    // ডিফল্ট ভাবে এটি src/index.js খুঁজে নেয়।
    entry: {
        index: path.resolve(process.cwd(), 'src', 'index.js'),
        editor: path.resolve(process.cwd(), 'src', 'editor.scss'),
    },
    // আউটপুট ফোল্ডার বিল্ড (build) ফোল্ডারে যাবে
    output: {
        path: path.resolve(process.cwd(), 'build'),
        filename: '[name].js',
    },
    plugins: [
        ...defaultConfig.plugins.filter(
            (plugin) => plugin.constructor.name !== 'RtlCssPlugin'
        ),
    ],
    performance: {
        ...defaultConfig.performance,
        maxAssetSize: 1000000,
        maxEntrypointSize: 1000000,
        hints: 'warning',
    },
};