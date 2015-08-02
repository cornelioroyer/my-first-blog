# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.conf import settings
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('words', '0003_auto_20150110_0833'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='words',
            name='dt_created',
        ),
        migrations.RemoveField(
            model_name='words',
            name='dt_updated',
        ),
        migrations.AddField(
            model_name='words',
            name='created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 13, 31, 58, 183023, tzinfo=utc), null=True, verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AddField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 13, 31, 58, 183023, tzinfo=utc), null=True, verbose_name='fecha hora update'),
            preserve_default=True,
        ),
        migrations.AddField(
            model_name='words',
            name='user',
            field=models.ForeignKey(to=settings.AUTH_USER_MODEL, default=1),
            preserve_default=True,
        ),
    ]
