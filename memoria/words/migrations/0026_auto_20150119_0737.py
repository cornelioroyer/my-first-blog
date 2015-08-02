# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0025_auto_20150118_1901'),
    ]

    operations = [
        migrations.AddField(
            model_name='opciones',
            name='vote',
            field=models.IntegerField(default=0),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', null=True, default=datetime.datetime(2015, 1, 19, 12, 37, 7, 201841, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', null=True, default=datetime.datetime(2015, 1, 19, 12, 37, 7, 201841, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
