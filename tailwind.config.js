module.exports = {
    purge: [],
    theme: {
        extend: {},
        fill: theme => ({
            red: theme("colors.red.500"),
            green: theme("colors.green.500"),
            blue: theme("colors.indigo.900")
        }),
        boxShadow: {
            white: "0 10px 15px -3px #ffffff38, 0 4px 6px -2px #fff0"
        }
    },
    variants: {
        fill: ["responsive", "hover", "focus"]
    },
    plugins: []
};
