# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0008_auto_20150111_0836'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 13, 38, 15, 616320, tzinfo=utc), verbose_name='fecha hora de creacion', null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 13, 38, 15, 616320, tzinfo=utc), verbose_name='fecha hora update', null=True),
            preserve_default=True,
        ),
    ]
