module.exports = function (color, options = {}) {
    function hexToRgb(hex) {
        const color = `#${hex}`,
            components = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(color);

        if (!components) return null;
        
        return {
            r: parseInt(components[1], 16),
            g: parseInt(components[2], 16),
            b: parseInt(components[3], 16)
        };
    }

    function rgbToHex(r, g, b) {
        const hexPart = (c) => `0${c.toString(16)}`.slice(-2);
        return `#${hexPart(r)}${hexPart(g)}${hexPart(b)}`;
    }
        
    function lighten(hex, intensity) {
        const color = hexToRgb(hex);
        return rgbToHex(
            Math.round(color.r + (255 - color.r) * intensity),
            Math.round(color.g + (255 - color.g) * intensity),
            Math.round(color.b + (255 - color.b) * intensity)
        );
    }

    function darken(hex, intensity) {
        const color = hexToRgb(hex);
        return rgbToHex(
            Math.round(color.r * intensity),
            Math.round(color.g * intensity),
            Math.round(color.b * intensity)
        );
    }

    function generateShade(shade) {
        shade = parseInt(shade);
        if (('only' in options) && !(options['only'].includes(shade))) return false;
        if (('skip' in options) && (options['skip'].includes(shade))) return false;
        return true
    }

    color = `${color}`.trimLeft('#');
    var colors = {};

    const tints = {
        100: 0.9, 200: 0.75, 300: 0.6, 400: 0.3
    };
    
    const shades = {
        600: 0.9, 700: 0.6, 800: 0.45, 900: 0.3,
    };

    for (const key in tints) {
        if (generateShade(key)) {
            colors[key] = lighten(color, tints[key]);
        }        
    }

    if (generateShade(500)) {
        colors[500] = `#${color}`;
    }

    for (const key in shades) { 
        if (generateShade(key)) {
            colors[key] = darken(color, shades[key]);
        }
    }

    return colors;
}