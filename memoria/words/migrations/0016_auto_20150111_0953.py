# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.conf import settings
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('words', '0015_auto_20150111_0946'),
    ]

    operations = [
        migrations.AddField(
            model_name='words',
            name='user',
            field=models.ForeignKey(default=1, to=settings.AUTH_USER_MODEL),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 11, 14, 53, 32, 365928, tzinfo=utc), verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 11, 14, 53, 32, 365928, tzinfo=utc), verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
