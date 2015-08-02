# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0005_auto_20150111_0833'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', null=True, default=datetime.datetime(2015, 1, 11, 13, 34, 15, 373357, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', null=True, default=datetime.datetime(2015, 1, 11, 13, 34, 15, 373357, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
