BDO Planner
========

## About

A character planner for Black Desert Online. Originally started as a gear/equipment calculator by [MrEliasen](https://github.com/MrEliasen), it was updated heavily and grown on to create a full character planner by [Ihm](https://github.com/Ihellmasker) and [Shadowtrance](https://github.com/Shadowtrance).

The current live version of the planner can be accessed at [BDOPlanner.com](http://www.bdoplanner.com).

Any features we're currently testing can be found on the Beta site [Beta.BDOPlanner.com](http://beta.bdoplanner.com) but there's no promises it'll actually work!

## Current Version

The Changelog can be viewed [here](https://github.com/Ihellmasker/BDO-Planner/blob/master/CHANGELOG.md).

## Support and Feedback

If you find any issues, or have any suggestions or questions, then please create a new ticket [here](https://github.com/Ihellmasker/BDO-Planner/issues).

## Contributors

[IHellmasker/Ihm](https://github.com/Ihellmasker)   
[Shadowtrance](https://github.com/Shadowtrance)    
[MrEliasen](https://github.com/MrEliasen)

## Important note about Repo

This repository does not include all server-side scripts, but other than that everything should work.

**ga.php** is simply a google analytic code block, feel free to remove the requirement for this file.
**bdo_database.js** is a rewrite of *bdo_database.php*. You can do this through a simple .htaccess mod_rewrite.
```
RewriteRule ^assets/js/bdo_database.js$ php/bdo_database.php [NC,L]
```

## Copyright & License

BDO Planner copyright (c) 2017 Andy Taylor. BDO Gear Calculator base code copyright (c) 2016 by Mark Eliasen.   
Released under [CC BY-NC 3.0 License](https://creativecommons.org/licenses/by-nc/3.0/legalcode).   
[Click here](https://creativecommons.org/licenses/by-nc/3.0/) for a human readable summary of the CC BY-NC 3.0 License.
