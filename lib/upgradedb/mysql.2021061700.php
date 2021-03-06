<?php

/*
 * LMS version 1.11-git
 *
 *  (C) Copyright 2001-2021 LMS Developers
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License Version 2 as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 *  USA.
 *
 */

$this->BeginTrans();

if (!$this->GetOne(
    'SELECT 1 FROM uiconfig WHERE section = ? AND var = ?',
    array(
        'userpanel',
        'document_approval_operator_notification_mail_recipient'
    )
)) {
    $this->Execute("
        INSERT INTO uiconfig (section, var, value, description, disabled) VALUES
            ('userpanel', 'document_approval_operator_notification_mail_recipient', '', '', 0);
    ");
}

if (!$this->GetOne(
    'SELECT 1 FROM uiconfig WHERE section = ? AND var = ?',
    array(
        'userpanel',
        'document_approval_operator_notification_mail_format'
    )
)) {
    $this->Execute("
        INSERT INTO uiconfig (section, var, value, description, disabled) VALUES
            ('userpanel', 'document_approval_operator_notification_mail_format', 'text', '', 0);
    ");
}

if (!$this->GetOne(
    'SELECT 1 FROM uiconfig WHERE section = ? AND var = ?',
    array(
        'userpanel',
        'document_approval_operator_notification_mail_subject'
    )
)) {
    $this->Execute("
        INSERT INTO uiconfig (section, var, value, description, disabled) VALUES
            ('userpanel', 'document_approval_operator_notification_mail_subject', '', '', 0);
    ");
}

if (!$this->GetOne(
    'SELECT 1 FROM uiconfig WHERE section = ? AND var = ?',
    array(
        'userpanel',
        'document_approval_operator_notification_mail_body'
    )
)) {
    $this->Execute("
        INSERT INTO uiconfig (section, var, value, description, disabled) VALUES
            ('userpanel', 'document_approval_operator_notification_mail_body', '', '', 0);
    ");
}

$this->Execute("UPDATE dbinfo SET keyvalue = ? WHERE keytype = ?", array('2021061700', 'dbversion'));

$this->CommitTrans();
