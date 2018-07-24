-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema saman
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema saman
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `saman` DEFAULT CHARACTER SET utf8 ;
USE `saman` ;

-- -----------------------------------------------------
-- Table `saman`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `token` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `created_at` DATETIME NOT NULL,
  INDEX `password_resets_email_index` (`email` ASC),
  INDEX `password_resets_token_index` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `saman`.`homes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`homes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`groups` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `home_id` INT UNSIGNED NOT NULL,
  `grant` VARCHAR(20) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_groups_homes1_idx` (`home_id` ASC),
  UNIQUE INDEX `grant_UNIQUE` (`grant` ASC),
  CONSTRAINT `fk_groups_homes1`
    FOREIGN KEY (`home_id`)
    REFERENCES `saman`.`homes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` INT UNSIGNED NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `name` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `family` VARCHAR(45) NOT NULL,
  `grant` VARCHAR(20) NOT NULL,
  `state` TINYINT(1) NOT NULL DEFAULT 1,
  `email` VARCHAR(255) CHARACTER SET 'utf8' NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `position` VARCHAR(45) NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_UNIQUE` (`username` ASC),
  INDEX `fk_users_groups1_idx` (`group_id` ASC),
  UNIQUE INDEX `grant_UNIQUE` (`grant` ASC),
  CONSTRAINT `fk_users_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `saman`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `saman`.`menus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`menus` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `alias` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  UNIQUE INDEX `alias_UNIQUE` (`alias` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` INT UNSIGNED NOT NULL,
  `menu_id` INT UNSIGNED NOT NULL,
  `grant` VARCHAR(45) NOT NULL,
  `create` TINYINT(1) NOT NULL DEFAULT 0,
  `read` TINYINT(1) NOT NULL DEFAULT 0,
  `delete` TINYINT(1) NOT NULL DEFAULT 0,
  `update` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `group_id`),
  INDEX `fk_permissions_menus1_idx` (`menu_id` ASC),
  INDEX `fk_permissions_groups1_idx` (`group_id` ASC),
  CONSTRAINT `fk_permissions_menus1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `saman`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissions_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `saman`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`groups_has_menus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`groups_has_menus` (
  `group_id` INT UNSIGNED NOT NULL,
  `menu_id` INT UNSIGNED NOT NULL,
  `order` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`order`, `group_id`, `menu_id`),
  INDEX `fk_groups_has_menus_menus1_idx` (`menu_id` ASC),
  INDEX `fk_groups_has_menus_groups1_idx` (`group_id` ASC),
  CONSTRAINT `fk_groups_has_menus_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `saman`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups_has_menus_menus1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `saman`.`menus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grtvss_sktns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grtvss_sktns` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shift` VARCHAR(45) NULL,
  `khbnvn` VARCHAR(45) NULL,
  `khbsngsf` VARCHAR(45) NULL,
  `khbsngsch` VARCHAR(45) NULL,
  `tts` VARCHAR(45) NULL,
  `km` VARCHAR(45) NULL,
  `kr` VARCHAR(45) NULL,
  `kl` VARCHAR(45) NULL,
  `n` VARCHAR(45) NULL,
  `s` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvss_sks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvss_sks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shift` VARCHAR(45) NULL,
  `kf` VARCHAR(45) NULL,
  `sshk` VARCHAR(45) NULL,
  `spk` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvss_mksps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvss_mksps` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `sh` VARCHAR(45) NULL,
  `m` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvkl_sssns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvkl_sssns` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shift` VARCHAR(45) NULL,
  `shk` VARCHAR(45) NULL,
  `s` VARCHAR(45) NULL,
  `nt` VARCHAR(45) NULL,
  `mt` VARCHAR(45) NULL,
  `ka` VARCHAR(45) NULL,
  `kl` VARCHAR(45) NULL,
  `tv` VARCHAR(45) NULL,
  `mz` VARCHAR(45) NULL,
  `avm` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvkl_sskks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvkl_sskks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shift` VARCHAR(45) NULL,
  `shk` VARCHAR(45) NULL,
  `kvk` VARCHAR(45) NULL,
  `kch` VARCHAR(45) NULL,
  `ka` VARCHAR(45) NULL,
  `rm` VARCHAR(45) NULL,
  `kr` VARCHAR(45) NULL,
  `t` VARCHAR(45) NULL,
  `nk` VARCHAR(45) NULL,
  `kk` VARCHAR(45) NULL,
  `qb` VARCHAR(45) NULL,
  `nsh` VARCHAR(45) NULL,
  `b` VARCHAR(45) NULL,
  `m` VARCHAR(45) NULL,
  `a` VARCHAR(45) NULL,
  `mla` VARCHAR(45) NULL,
  `ql` VARCHAR(45) NULL,
  `ts` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvkl_saaas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvkl_saaas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shift` VARCHAR(45) NULL,
  `shk` VARCHAR(45) NULL,
  `apk` VARCHAR(45) NULL,
  `apch` VARCHAR(45) NULL,
  `apr` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grvkl_smms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grvkl_smms` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` VARCHAR(45) NOT NULL,
  `mng` VARCHAR(45) NULL,
  `mt` VARCHAR(45) NULL,
  `ssh` VARCHAR(45) NULL,
  `description` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvbb_snsns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvbb_snsns` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shk` VARCHAR(45) NULL,
  `nkr` VARCHAR(45) NULL,
  `s` VARCHAR(45) NULL,
  `nq` VARCHAR(45) NULL,
  `d1s` VARCHAR(45) NULL,
  `d1m` VARCHAR(45) NULL,
  `d1l` VARCHAR(45) NULL,
  `d2s` VARCHAR(45) NULL,
  `d2m` VARCHAR(45) NULL,
  `d2l` VARCHAR(45) NULL,
  `d3` VARCHAR(45) NULL,
  `d4` VARCHAR(45) NULL,
  `d5` VARCHAR(45) NULL,
  `mkt` VARCHAR(45) NULL,
  `z` VARCHAR(45) NULL,
  `aq` VARCHAR(45) NULL,
  `aaa` VARCHAR(45) NULL,
  `aks` VARCHAR(45) NULL,
  `aas` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvbb_sats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvbb_sats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shk` VARCHAR(45) NULL,
  `kt` VARCHAR(45) NULL,
  `khn` VARCHAR(45) NULL,
  `kgp` VARCHAR(45) NULL,
  `krm` VARCHAR(45) NULL,
  `kp` VARCHAR(45) NULL,
  `ksh` VARCHAR(45) NULL,
  `kcpk` VARCHAR(45) NULL,
  `ko` VARCHAR(45) NULL,
  `ktt` VARCHAR(45) NULL,
  `qb` VARCHAR(45) NULL,
  `nk` VARCHAR(45) NULL,
  `tt` VARCHAR(45) NULL,
  `kv` VARCHAR(45) NULL,
  `kk` VARCHAR(45) NULL,
  `kg` VARCHAR(45) NULL,
  `ofb` VARCHAR(45) NULL,
  `ts` VARCHAR(45) NULL,
  `sm` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvbb_mmrs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvbb_mmrs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `msh` VARCHAR(45) NULL,
  `mt` VARCHAR(45) NULL,
  `rl` VARCHAR(45) NULL,
  `apm` MEDIUMTEXT NULL,
  `nh` MEDIUMTEXT NULL,
  `makd` MEDIUMTEXT NULL,
  `n` MEDIUMTEXT NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvp_sssns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvp_sssns` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shp` VARCHAR(45) NULL,
  `s` VARCHAR(45) NULL,
  `sp` VARCHAR(45) NULL,
  `np` VARCHAR(45) NULL,
  `tz` VARCHAR(45) NULL,
  `rp` VARCHAR(45) NULL,
  `mt` VARCHAR(45) NULL,
  `mz` VARCHAR(45) NULL,
  `a` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvp_snfts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvp_snfts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` VARCHAR(45) NOT NULL,
  `shk` VARCHAR(45) NULL,
  `np` VARCHAR(45) NULL,
  `fg` VARCHAR(45) NULL,
  `td` VARCHAR(45) NULL,
  `ad` VARCHAR(45) NULL,
  `ras` VARCHAR(45) NULL,
  `ts` VARCHAR(45) NULL,
  `tq` VARCHAR(45) NULL,
  `tam` VARCHAR(45) NULL,
  `kl` VARCHAR(45) NULL,
  `tk` VARCHAR(45) NULL,
  `kk` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvp_stts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvp_stts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shk` VARCHAR(45) NULL,
  `b` VARCHAR(45) NULL,
  `a` VARCHAR(45) NULL,
  `m` VARCHAR(45) NULL,
  `j` VARCHAR(45) NULL,
  `s` VARCHAR(45) NULL,
  `qb` VARCHAR(45) NULL,
  `qg` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`gsvp_hmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`gsvp_hmas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `h` VARCHAR(45) NULL,
  `aa` VARCHAR(45) NULL,
  `ts` VARCHAR(45) NULL,
  `mn` VARCHAR(45) NULL,
  `mam` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grtb_stks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grtb_stks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `shb` VARCHAR(45) NULL,
  `tsh` VARCHAR(45) NULL,
  `kf` VARCHAR(45) NULL,
  `zchs` VARCHAR(45) NULL,
  `gss` VARCHAR(45) NULL,
  `rs` VARCHAR(45) NULL,
  `zcha` VARCHAR(45) NULL,
  `gsa` VARCHAR(45) NULL,
  `ra` VARCHAR(45) NULL,
  `zchh` VARCHAR(45) NULL,
  `gsh` VARCHAR(45) NULL,
  `rh` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grtb_kas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grtb_kas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `ka` VARCHAR(45) NULL,
  `shift` VARCHAR(45) NULL,
  `kf` VARCHAR(45) NULL,
  `sk` VARCHAR(45) NULL,
  `tlf` VARCHAR(45) NULL,
  `tn` VARCHAR(45) NULL,
  `fp` VARCHAR(45) NULL,
  `fs` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saman`.`grtb_mms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saman`.`grtb_mms` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `t` VARCHAR(45) NULL,
  `c` VARCHAR(45) NULL,
  `v` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `datetime`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
