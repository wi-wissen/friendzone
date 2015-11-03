CREATE TABLE IF NOT EXISTS profiles (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  gender varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  forename varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  street varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  city varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  zipcode varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  country varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  mail varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  telephone varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  color varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  centimeters smallint(6) DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)