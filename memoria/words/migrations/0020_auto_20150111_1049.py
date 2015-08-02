# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0019_auto_20150111_1044'),
    ]

    operations = [
        migrations.RenameField(
            model_name='words',
            old_name='user_id',
            new_name='user',
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', null=True, default=datetime.datetime(2015, 1, 11, 15, 49, 22, 422857, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', null=True, default=datetime.datetime(2015, 1, 11, 15, 49, 22, 422857, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
