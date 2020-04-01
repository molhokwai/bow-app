<img src="https://raw.githubusercontent.com/bowphp/arts/master/bow.jpg" width="100">

## Bow Framework

<a href="https://bowphp.github.io" title="docs"><img src="https://img.shields.io/badge/docs-read%20docs-blue.svg?style=flat-square"/></a>
<a href="https://packagist.org/packages/bowphp/app" title="version"><img src="https://img.shields.io/packagist/v/bowphp/app.svg?style=flat-square"/></a>
<a href="https://github.com/bowphp/app/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>
<a href="https://travis-ci.org/bowphp/app" title="Travis branch"><img src="https://img.shields.io/travis/bowphp/app/master.svg?style=flat-square"/></a>

Bow is a PHP Framework, written by **[Franck DAKIA](http://github.com/papac)** and several other contributors.

The goal is to allow beginners who want to work on a project a little bigger to get started, to understand the workings of **collaborative development**. And make this framework a reference in the PHP community around the world.

**Do not hesitate to start now with the [documentation](https://bowphp.github.io).**

## Default branch
Here is the location of the default branch [bowphp/app](https://github.com/bowphp/app)
Please consult for **Prerequisites** and more...


## This branch
This branch was written by **[Mayou Nkensa | molhokwai](http://github.com/molhokwai)** _([molhokwai@gmail.com](mailto:molhokwai@gmail.com))_.
It was built as an inception, a demo of how Bow can be used to generate a mini (mini), raw cms (actually just raw articles crud|management pages).

Please note that:
- `config/database.php` connection details are not used `vendor/bowphp/framework/src/Database/Connection/Adapter/MysqlAdapter.php`, so they are hard coded there
- The code is very (very) raw, not optimized, not refactored, not necessarily integrated in the Bow framework logic...
- The layout is the same, raw, bare, basic...


### Running the branch's app
If you are not running bow yet, after having installed bow as described in [Bow - Installation](https://bowphp.github.io/docs/installation),
You can initialize git and checkout this branch **!This is not tested**... 
Or manually copy/overwrite these files with that of the branch:

```
  app/Controller/ArticlesController.php
  app/Model/Article.php
  config/database.php
  frontend/articles/*
  frontend/layout.tintin.php
  routes/app.php
  vendor/bowphp/framework/src/Database/Connection/Adapter/MysqlAdapter.php
```

Then `> php bow run:server`, as described in [Bow - Installation](https://bowphp.github.io/docs/installation)
...and your application will be running at `localhost:5000`

### Screen capture
This is what you should see:
_( click the image to see the 42s screencast )_
[![Demo branch application screenshot](https://user-images.githubusercontent.com/89254/78118932-96ad0e80-73ff-11ea-8408-125109385703.png)
](https://drive.google.com/open?id=1XFvcnQwWcy48zemI4XetxDzCDMei5Xal)

For more information look at this Markdown cheatsheet on GitHub.

#### Database
You must first generate the database, table and tabel content by running:
- [tests/Model/3.1-base-de-données-création.sql](./tests/Model/3.1-base-de-données-création.sql)
- and [tests/Model/3.1-base-de-données-création-alter-for-bow](./tests/Model/3.1-base-de-données-création-alter-for-bow)

... then setup the configs with your connection details
- [config/database.php](./config/database.php)
- [vendor/.../MysqlAdapter.php](./vendor/bowphp/framework/src/Database/Connection/Adapter/MysqlAdapter.php)

_(as you will see it is based on Cake PHP getting started tutorial database...)_


### The Purpose
... of this branch is to maybe serve to enrich the documentation after having cleaned, refactored and properly integrate it into Bow....
**Voilà**


## Contributing

Thank you for considering contributing to Bow Framework! The contribution guide is in the framework documentation.

- [Franck DAKIA](https://github.com/papac)
- [Thank's collaborators](https://github.com/bowphp/app/graphs/contributors)

## Contact

[dakiafranck@gmail.com](mailto:dakiafranck@gmail.com) - [@franck_dakia](https://twitter.com/franck_dakia)

**Please, if there is a bug on the project please contact me by email or leave me a message on the [slack](https://bowphp.slack.com). or [join us on slask](https://join.slack.com/t/bowphp/shared_invite/enQtNzMxOTQ0MTM2ODM5LTQ3MWQ3Mzc1NDFiNDYxMTAyNzBkNDJlMTgwNDJjM2QyMzA2YTk4NDYyN2NiMzM0YTZmNjU1YjBhNmJjZThiM2Q)**
