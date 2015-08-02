# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.conf import settings
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('words', '0016_auto_20150111_0953'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='words',
            name='user',
        ),
        migrations.AddField(
            model_name='words',
            name='user_id',
            field=models.ForeignKey(to=settings.AUTH_USER_MODEL, default=1),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 11, 14, 55, 4, 104325, tzinfo=utc), null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 11, 14, 55, 4, 104325, tzinfo=utc), null=True),
            preserve_default=True,
        ),
    ]
