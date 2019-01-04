$(function () {
    $('#analytics-map-markers').vectorMap({
        map : 'world_mill_en',
        scaleColors : ['#ea6c9c', '#ea6c9c'],
        normalizeFunction : 'polynomial',
        hoverOpacity : 0.7,
        hoverColor : false,
        regionStyle : {
            initial : {
                fill : '#e0e0e0'
            }
        },
        markerStyle: {
            initial: {
                r: 15,
                'fill': '#ffd560',
                'fill-opacity': 0.9,
                'stroke': '#fff',
                'stroke-width' : 5,
                'stroke-opacity': 0.5
            },

            hover: {
                'stroke': '#fff',
                'fill-opacity': 1,
                'stroke-width': 5
            }
        },
        backgroundColor : 'transparent',
        markers: countryInfo
    });
});

$(function () {
    $(".total-revenue").knob();
});

$(function () {
    Morris.Donut({
        element: 'analytics_donut_chart',
        data: browserData,
        colors: colors,
        formatter: function (y) {
            return y + '%'
        }
    });
});