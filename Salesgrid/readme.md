Ewave Customizations of Import/Export Bundle
=====================
##Installation

1) Install the package

```bash
composer require sergeycherepanov/salesgrid:^1.0.0
```

2) Enable module
```bash
bin/magento module:enable Sergeycherepanov_Salesgrid
```

3) Compile DI
```bash
bin/magento setup:di:compile
```

4) Update DB
```bash
bin/magento setup:upgrade
```

5) Initialize extra columns
```bash
bin/magento sergeycherepanov:salesgrid:refresh_sales_grid
```
