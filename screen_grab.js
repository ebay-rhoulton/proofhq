var page = require('webpage').create(),
system = require('system'),
url = system.args[1],
filename = system.args[2];


page.open(url, function () {
    page.render(filename);
    phantom.exit();
});