module.exports = {
    purge: [],
    theme: {
        extend: {},
        fill: theme => ({
            red: theme("colors.red.500"),
            green: theme("colors.green.500"),
            blue: theme("colors.indigo.900")
        })
    },
    variants: {
        fill: ["responsive", "hover", "focus"]
    },
    plugins: []
};
