/*
 * Chartist  - Charts
 */

//SIMPLE LINE CHART
new Chartist.Line('#ct1-chart', {
  labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
  series: [
    [12, 9, 7, 8, 5],
    [2, 1, 3.5, 7, 3],
    [1, 3, 4, 5, 6]
  ]
}, {
    fullWidth: true,
    chartPadding: {
      right: 40
    }
  });

// HOLES IN DATA
var chart = new Chartist.Line('#ct2-chart', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
  series: [
    [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9],
    [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null],
    [null, null, null, null, 3, 4, 1, 3, 4, 6, 7, 9, 5, null, null, null],
    [{ x: 3, y: 3 }, { x: 4, y: 3 }, { x: 5, y: undefined }, { x: 6, y: 4 }, { x: 7, y: null }, { x: 8, y: 4 }, { x: 9, y: 4 }]
  ]
}, {
    fullWidth: true,
    chartPadding: {
      right: 10
    },
    low: 0
  });


// LINE SCATTER DIAGRAM WITH RESPONSIVE SETTINGS
var times = function (n) {
  return Array.apply(null, new Array(n));
};

var data = times(52).map(Math.random).reduce(function (data, rnd, index) {
  data.labels.push(index + 1);
  data.series.forEach(function (series) {
    series.push(Math.random() * 100)
  });

  return data;
}, {
    labels: [],
    series: times(4).map(function () { return new Array() })
  });

var options = {
  showLine: false,
  axisX: {
    labelInterpolationFnc: function (value, index) {
      return index % 13 === 0 ? 'W' + value : null;
    }
  }
};

var responsiveOptions = [
  ['screen and (min-width: 640px)', {
    axisX: {
      labelInterpolationFnc: function (value, index) {
        return index % 4 === 0 ? 'W' + value : null;
      }
    }
  }]
];

new Chartist.Line('#ct3-chart', data, options, responsiveOptions);

// LINE CHART WITH AREA
new Chartist.Line('#ct4-chart', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8],
  series: [
    [5, 9, 7, 8, 5, 3, 5, 4]
  ]
}, {
    low: 0,
    showArea: true
  });

// BI-POLAR LINE CHART WITH AREA ONLY
new Chartist.Line('#ct5-chart', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8],
  series: [
    [1, 2, 3, 1, -2, 0, 1, 0],
    [-2, -1, -2, -1, -2.5, -1, -2, -1],
    [0, 0, 0, 1, 2, 2.5, 2, 1],
    [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
  ]
}, {
    high: 3,
    low: -3,
    showArea: true,
    showLine: false,
    showPoint: false,
    fullWidth: true,
    axisX: {
      showLabel: false,
      showGrid: false
    }
  });

// USING EVENTS TO REPLACE GRAPHICS
var chart = new Chartist.Line('#ct6-chart', {
  labels: [1, 2, 3, 4, 5],
  series: [
    [12, 9, 7, 8, 5]
  ]
});

// Listening for draw events that get emitted by the Chartist chart
chart.on('draw', function (data) {
  // If the draw event was triggered from drawing a point on the line chart
  if (data.type === 'point') {
    // We are creating a new path SVG element that draws a triangle around the point coordinates
    var triangle = new Chartist.Svg('path', {
      d: ['M',
        data.x,
        data.y - 15,
        'L',
        data.x - 15,
        data.y + 8,
        'L',
        data.x + 15,
        data.y + 8,
        'z'].join(' '),
      style: 'fill-opacity: 1'
    }, 'ct-area');

    // With data.element we get the Chartist SVG wrapper and we can replace the original point drawn by Chartist with our newly created triangle
    data.element.replace(triangle);
  }
});


// BI-POLAR BAR CHART
var data = {
  labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
  series: [
    [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
  ]
};

var options = {
  high: 10,
  low: -10,
  axisX: {
    labelInterpolationFnc: function (value, index) {
      return index % 2 === 0 ? value : null;
    }
  }
};

new Chartist.Bar('#ct7-chart', data, options);


// BI-POLAR BAR CHART
var data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  series: [
    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
  ]
};

var options = {
  seriesBarDistance: 10
};

var responsiveOptions = [
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

new Chartist.Bar('#ct8-chart', data, options, responsiveOptions);


// BI-POLAR BAR CHART
var data = {
  series: [5, 3, 4]
};

var sum = function (a, b) { return a + b };

new Chartist.Pie('#ct9-chart', data, {
  labelInterpolationFnc: function (value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
});

// ANIMATING A DONUT WITH SVG.ANIMATE
var chart = new Chartist.Pie('#ct10-chart', {
  series: [10, 20, 50, 20, 5, 50, 15],
  labels: [1, 2, 3, 4, 5, 6, 7]
}, {
    donut: true,
    showLabel: false
  });

chart.on('draw', function (data) {
  if (data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
    });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to: '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
      }
    };

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if (data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
    }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
    });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 8 seconds
chart.on('created', function () {
  if (window.__anim21278907124) {
    clearTimeout(window.__anim21278907124);
    window.__anim21278907124 = null;
  }
  window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
});
