CREATE TABLE IF NOT EXISTS profile_profile (
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  profile_id int(10) unsigned NOT NULL,
  friend_id int(10) unsigned NOT NULL,
  KEY profile_profile_friend_id_foreign (friend_id),
  KEY profile_profile_profile_id_index (profile_id)
);

ALTER TABLE profile_profile
  ADD CONSTRAINT profile_profile_friend_id_foreign FOREIGN KEY (friend_id) REFERENCES profiles (id) ON DELETE CASCADE,
  ADD CONSTRAINT profile_profile_profile_id_foreign FOREIGN KEY (profile_id) REFERENCES profiles (id) ON DELETE CASCADE;