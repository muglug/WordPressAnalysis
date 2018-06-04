# Type-checking WordPress with Psalm

To install all the necessary dependencies, you must first have [Composer](https://getcomposer.org). Once that's installed, run

```
git clone https://github.com/muglug/WordPressAnalysis
cd WordPressAnalysis
git clone https://github.com/wordpress/wordpress src
cp src/wp-config-sample.php src/wp-config.php
composer install
```

To do the actual analysis, run
```
./vendor/bin/psalm
```
