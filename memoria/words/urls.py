from django.conf.urls import patterns, url
from words import views



urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
	url(r'^(?P<words_id>\d+)/$', views.detail, name='detail'),
	url(r'^(?P<words_id>\d+)/results/$', views.results, name='results'),
	url(r'^(?P<words_id>\d+)/vote/$', views.vote, name='vote'),
)



'''
	url(r'^(?P<question_id>\d+)/vote/$', views.vote, name='vote'),

	url(r'^$', views.IndexView.as_view(), name='index'),

	url(r'^(?P<pk>\d+)/$', views.DetailView.as_view(), name='detail'),

urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
	url(r'^(?P<words_id>\d+)/$', views.detail, name='detail'),
	url(r'^(?P<opciones_id>\d+)/vote/$', views.vote, name='vote'),
)


urlpatterns = patterns('',
	url(r'^$', views.IndexView.as_view(), name='index'),
	url(r'^(?P<pk>\d+)/$', views.DetailView.as_view(), name='detail'),
	url(r'^(?P<pk>\d+)/results/$', views.ResultsView.as_view(), name='results'),
	url(r'^(?P<question_id>\d+)/vote/$', views.vote, name='vote'),
)


	url(r'^(?P<words_id>\d+)/$', views.detail, name='detail'),
	url(r'^(?P<words_id>\d+)/results/$', views.results, name='results'),
	url(r'^(?P<words_id>\d+)/vote/$', views.vote, name='vote'),

urlpatterns = patterns('', url(r'^$', views.index, name='index'),)

	url(r'^(?P<words_id>\d+)/$', views.detail, name='detail'),


urlpatterns = patterns('',
	url(r'^$', views.IndexView.as_view(), name='index'),
	url(r'^(?P<pk>\d+)/$', views.DetailView.as_view(), name='detail'),
	url(r'^(?P<pk>\d+)/results/$', views.ResultsView.as_view(), name='results'),
	url(r'^(?P<question_id>\d+)/vote/$', views.vote, name='vote'),
)


'''

