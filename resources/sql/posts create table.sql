CREATE TABLE IF NOT EXISTS posts (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  title varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  blogpost varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  profile_id int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY posts_profile_id_foreign (profile_id)
);

ALTER TABLE posts
  ADD CONSTRAINT posts_profile_id_foreign FOREIGN KEY (profile_id) REFERENCES profiles (id) ON DELETE CASCADE;