# Upgrade guide

## 1.x to 3.0

The 3.0 version is NOT backward compatible. Version 3 connects with v3 API calls and handles the move from Members to Contacts. 
Migrating to these new models and names should not be a big problem. The flows are mostly the same. Here's a list of what models names changed:

* Members -> Contacts
* Cards -> ContactIdentifiers

If you've stored Member IDs in your database, you should retrieve the Contact UUID for the e-mail address of that member and use that.

## 0.x to 1.x

Most API calls now take primitive types as params. So please check all the API calls and update the accordingly.