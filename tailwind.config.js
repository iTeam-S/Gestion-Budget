module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors:{
                'teal': '#008080',
            }
        }
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
