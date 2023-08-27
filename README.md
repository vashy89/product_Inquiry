# Pwc/ProductInquiry

- Product Inquiry Form and Notification Module. 

- Adds a product inquiry form to the product detail page. When customers submit an inquiry, the module should notify the store admin via email. Additionally, the admin should be able to view and reply to inquiries from the backend, sending email responses to the customers.

- Tested on Magento Community Edition  `Magento 2.4.6`.

## Composer Install module

1. Run `composer config repositories.product_Inquiry vcs https://github.com/vashy89/product_Inquiry`

2. Run `composer require pwc/product-inquiry`

3. Run `bin/magento setup:db-declaration:generate-whitelist --module-name=Pwc_ProductInquiry`

3. Run `php bin/magento setup:upgrade`

4. Run `php bin/magento setup:di:compile`

5. Run `php bin/magento s:s:d en_US`

6. Run `php bin/magento c:c`

## Composer Uninstall module

1. Run `composer remove pwc/product-inquiry`

2. Run `php bin/magento setup:di:compile`

3. Run `php bin/magento s:s:d en_US`

4. Run `php bin/magento c:c`

## Preview Front-End

![PDP Inquiry Form](/readme-images/inquiry-form.png.png "PDP Inquiry Form")


## Module Admin Configuration Settings

**Go to : Admin->store->configuration->pwd->product_inquiry_form->options->enable**

## Gmail SMTP Creds

- Go to your Google Account and choose Security on the left panel.

- On the Signing in to Google tab, select App Passwords.

- ![App-Password](/readme-images/App-Password.png "App-Password")

- Generate new Password for the gmail account to be used in SMTP creds Auth.

- ![Generate-Password](/readme-images/gmail-app-pass.png "Generate-Password")

## Configur SMTP in Admin Panel

-  **Go to : Admin->store->configuration->advance->system->mail sending settings**

- Place your gmail credentials.

- ![smtp-configuration](/readme-images/smtp-configuration.png "smtp-configuration")

## Admin Reply Option

- ![admin-inquiry](/readme-images/admin-inquiry.png "admin-inquiry")

## Known issues
- Database Table not created while installing module.
`Follow Step 3,4 from Installation process`

- **Notification E-Mails could go to spam folder in gmail or any other mail platform**


## Developer Information
- Vashishtha Chauhan
- Email `vashishtha.prime@gmail.com`
- Mobile `+91 9898121095`
