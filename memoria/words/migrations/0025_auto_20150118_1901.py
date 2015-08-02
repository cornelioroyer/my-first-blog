# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0024_auto_20150118_1852'),
    ]

    operations = [
        migrations.RenameField(
            model_name='opciones',
            old_name='descripcion',
            new_name='d_english',
        ),
        migrations.AddField(
            model_name='opciones',
            name='d_spanish',
            field=models.CharField(max_length=300, null=True, db_index=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 19, 0, 1, 43, 15994, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 19, 0, 1, 43, 15994, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
