# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0013_auto_20150111_0901'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='words',
            name='user',
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 11, 14, 1, 40, 330422, tzinfo=utc), verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 11, 14, 1, 40, 330422, tzinfo=utc), verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
