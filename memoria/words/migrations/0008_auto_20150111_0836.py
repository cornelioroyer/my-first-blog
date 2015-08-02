# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0007_auto_20150111_0836'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 11, 13, 36, 26, 841145, tzinfo=utc), null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 11, 13, 36, 26, 841145, tzinfo=utc), null=True),
            preserve_default=True,
        ),
    ]
