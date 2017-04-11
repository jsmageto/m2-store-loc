Magento 2 Store Location

Installation:

1. create folder app/code/JM/StoreLocator
2. copy all files
3. from shell M2 root, run "php bin/magento setup:upgrade"
4. then run "php bin/magento setup:static-content:deploy -f"
5. then run "php bin/magento cache:flush"
6. login to backend, open JM StoreLocator->StoreLocator to insert the locations
7. if it's necessary, run "php bin/magento cache:flush"
8. open this url http://YourM2Url.com/storelocator to view the store locator
