# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0018_auto_20150111_1043'),
    ]

    operations = [
        migrations.RenameField(
            model_name='opciones',
            old_name='words_id',
            new_name='words',
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 15, 44, 38, 814338, tzinfo=utc), null=True, verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 15, 44, 38, 814338, tzinfo=utc), null=True, verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
