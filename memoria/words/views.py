#from django.shortcuts import render
from django.http import HttpResponse
from words.models import Words, Opciones
from django.template import RequestContext, loader
from django.shortcuts import render, get_object_or_404, render_to_response
from django.views import generic
from django.http import HttpResponseRedirect
from django.core.urlresolvers import reverse
import datetime


def index(request):
    latest_words_list = Words.objects.filter(next_question__lte=datetime.date.today()).order_by('next_question', 'puntos','?')[:1]
    context = {'latest_words_list': latest_words_list}
    return render_to_response('words/index.html', context)

def detail(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    opciones = Opciones.objects.filter(words1_id = words_id).order_by('?')
    return render_to_response('words/detail.html', {'words': words, 'opciones': opciones},context_instance=RequestContext(request))


def vote(request, words_id):
    p = Words.objects.get(id = words_id)
    x = request.POST.get('opcion')
    opciones = get_object_or_404(Opciones, pk=x)
    if opciones.words1_id == opciones.words2_id:
        p.puntos = p.puntos + 1
    else:
        if p.puntos > 0:
            p.puntos = 0

        p.mistakes += 1
        p.puntos += -2


    p.save()

    if p.puntos >= 0:
        latest_words_list = Words.objects.filter(next_question__lte=datetime.date.today()).order_by('next_question', 'puntos','?')[:1]
        context = {'latest_words_list': latest_words_list}
        return render_to_response('words/index.html', context)
    else:
        return HttpResponseRedirect(reverse('words:results', args=(p.id,))) 


def results(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    return render(request, 'words/results.html', {'words': words})



'''
    if p.puntos >= 0:
        latest_words_list = Words.objects.filter(next_question__lte=datetime.date.today()).order_by('next_question', 'puntos','?')[:1]
        context = {'latest_words_list': latest_words_list}
        return render_to_response('words/index.html', context)
    else:
        return HttpResponseRedirect(reverse('words:results', args=(p.id,))) 


    return HttpResponseRedirect(reverse('words:results', args=(p.id,))) 


    p.updated = datetime.datetime.now()        

    if p.puntos == 0:
        p.next_question = datetime.date.today()


        d = datetime.timedelta(days = -2)        
        p.next_question = datetime.date.today() + d

#        p.puntos = p.puntos - 2
#        d = datetime.timedelta(days = -2)        
#        p.next_question += d
#        p.next_question = datetime.date.today() + d
#        p.puntos = 0
        p.next_question = datetime.date.today()



        if p.puntos < 0:
            d = datetime.timedelta(days = -1)        
            p.next_question = datetime.date.today() + d
        else:
            d = datetime.timedelta(days = p.puntos)        
            if p.puntos == 0:
#                p.next_question = datetime.date.today() + d
                p.puntos = 0
                p.next_question = datetime.date.today()
            else:                
                p.next_question += d

def vote(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    try:
        selected_choice = p.opciones+_set.get(pk=request.POST['choice'])
    except (KeyError, Opciones.DoesNotExist):
# Redisplay the question voting form.
        return render(request, 'words/detail.html', {
            'words': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_choice.puntos += 1
        selected_choice.save()

    words = get_object_or_404(Words, pk=words_id)
    x = request.POST.get('opcion')
    opciones = get_object_or_404(Opciones, pk=x)
    if opciones.words1_id == opciones.words2_id:
        words.puntos = words.puntos + 1
    else:
        words.puntos = words.puntos + 1
    words.save()        



        return HttpResponse("buena")

    opciones = get_object_or_404(Opciones, pk=x)
    if opciones.words1_id == opciones.words2_id:
        return HttpResponse("buena")
    else:
        return HttpResponse("mala")



    p = get_object_or_404(Words, pk=words_id)
    try:
        selected_choice = p.opciones+_set.get(pk=request.POST['choice'])
    except (KeyError, Opciones.DoesNotExist):
# Redisplay the question voting form.
        return render(request, 'words/detail.html', {
            'words': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_choice.puntos += 1
        selected_choice.save()


def detail(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    return render(request, 'words/detail.html', {'words': words})

#    return render(request, 'words/detail.html', {'words': words, 'opciones': opciones})


    x = int(request.POST.get('opciones'))
#    return HttpResponse("buena %s", % opciones)
#    return HttpResponse(x)
    opciones = get_object_or_404(Opciones, pk=x)
    if opciones.words1_id == opciones.words2_id:
        return HttpResponse("buena")
    else:
        return HttpResponse("mala")





    try:
        selected_choice = p.opciones_set.get(pk=request.POST['opciones'])
    except (KeyError, Opciones.DoesNotExist):
        return render(request, 'words_id/detail.html', {
            'words': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_choice.votes += 1
        selected_choice.save()
        # Always return an HttpResponseRedirect after successfully dealing
        # with POST data. This prevents data from being posted twice if a
        # user hits the Back button.
        return HttpResponseRedirect(reverse('polls:results', args=(p.id,))) 



    return render_to_response("entre")

    opciones = get_object_or_404(Opciones, pk=opciones_id)
    if opciones.words1_id == opciones.words2_id:
        return HttpResponse("buena")
    else:
        return HttpResponse("mala")


        Print("thanks")

    #words2_id = opciones.words2_id
    return HttpResponse("hello %s." % words2_id)

    #p = opciones.filter(words1_id = words2_id)



    if opciones.object.words1_id = opciones.object.words
    try:
        selected_choice = p.choice_set.get(pk=request.POST['choice'])
    except (KeyError, Choice.DoesNotExist):
# Redisplay the question voting form.
        return render(request, 'polls/detail.html', {
            'question': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_choice.votes += 1
        selected_choice.save()
        # Always return an HttpResponseRedirect after successfully dealing
        # with POST data. This prevents data from being posted twice if a
        # user hits the Back button.
        return HttpResponseRedirect(reverse('polls:results', args=(p.id,))) 




def index(request):
    latest_words_list = Words.objects.order_by('-puntos','?')[:1]
    return render_to_response('words/index.html', {'latest_words_list': latest_words_list})    


def detail(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    opciones = Opciones.objects.filter(words1_id = words_id).order_by('?')
    return render_to_response('words/detail.html', {'words': words, 'opciones': opciones})

    
def results(request, question_id):
    question = get_object_or_404(Question, pk=question_id)
    return render(request, 'words/results.html', {'question': question})

def vote(request, words_id):
    p = get_object_or_404(Words, pk=words_id)
    try:
        selected_opciones = p.opciones_set.get(pk=request.POST['opciones'])
    except (KeyError, Opciones.DoesNotExist):
# Redisplay the question voting form.
    return render(request, 'words/detail.html', {
        'words': p,
        'error_message': "You didn't select a choice.",
        })
    else:
        selected_opciones.puntos += 1
        selected_opciones.save()
# Always return an HttpResponseRedirect after successfully dealing
# with POST data. This prevents data from being posted twice if a
# user hits the Back button.
        return HttpResponseRedirect(reverse('words:results', args=(p.id,)))    
#return render_to_response('words/index.html', {'latest_words_list': latest_words_list})    


    try:
        selected_choice = p.choice_set.get(pk=request.POST['choice'])
    except (KeyError, Choice.DoesNotExist):
# Redisplay the question voting form.
        return render(request, 'words/detail.html', {
            'opciones': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_choice.votes += 1
        selected_choice.save()
        # Always return an HttpResponseRedirect after successfully dealing
        # with POST data. This prevents data from being posted twice if a
        # user hits the Back button.
        return HttpResponseRedirect(reverse('words:results', args=(p.id,))) 


def detail(request, question_id):
    question = get_object_or_404(Question, pk=question_id)
    return render(request, 'polls/detail.html', {'question': question})

class IndexView(generic.ListView):
    template_name = 'words/index.html'
    context_object_name = 'latest_words_list'

    def get_queryset(self):
        """Return the last five published questions."""
        return Words.objects.order_by('-puntos','?')[:1]

class DetailView(generic.DetailView):
    model = Words
    template_name = 'words/detail.html'


class ResultsView(generic.DetailView):
    model = Words
    template_name = 'polls/results.html'







def index(request):
    latest_question_list = Question.objects.order_by('-pub_date')[:5]
    context = {'latest_question_list': latest_question_list}
    return render(request, 'polls/index.html', context)


def detail(request, words_id):
    words = get_object_or_404(Words, pk=words_id)
    opciones = Opciones.objects.filter(words1_id = words_id).order_by('?')
    return render(request, 'words/detail.html', {'words':  words, 'opciones':  opciones})


def results(request, words_id):
    response = "You're looking at the results of question %s."
    return HttpResponse(response % words_id)

def vote(request, opciones_id):
    p = get_object_or_404(Opciones, pk=opciones_id)
    try:
        selected_opcion = p.opciones_set.get(pk=request.POST['opcion'])
    except (KeyError, Opciones.DoesNotExist):
# Redisplay the question voting form.
        return render(request, 'words/detail.html', {
            'opciones': p,
            'error_message': "You didn't select a choice.",
        })
    else:
        selected_opcion.vote = 1
        selected_opcion.save()
        # Always return an HttpResponseRedirect after successfully dealing
        # with POST data. This prevents data from being posted twice if a
        # user hits the Back button.
        return HttpResponseRedirect(reverse('words:results', args=(p.id,))) 


def vote(request, words_id):
    return HttpResponse("You're voting on question %s." % words_id)



    return HttpResponse("You're looking at question %s." % words_id)
def index(request):
    latest_words_list = Words.objects.order_by('-puntos')[:5]
    output = ', '.join([p.english for p in latest_words_list])
    return HttpResponse(output)

def index(request):
    latest_words_list = Words.objects.order_by('-puntos')[:5]
    template = loader.get_template('words/index.html')
    context = RequestContext(request, {
        'latest_words_list': latest_words_list,
    })
    return HttpResponse(template.render(context))



def index(request):
    latest_words_list = Words.objects.order_by('-puntos')[:2]
    context = {'latest_words_list': latest_words_list}
    return render(request, 'words/index.html', context)


def detail(request, words_id):
	words = get_object_or_404(Words, pk=words_id)
	return render(request, 'words/detail.html', {'words':  words})

def results(request, words_id):
	question = get_object_or_404(Words, pk=word_id)
	return render(request, 'words/results.html', {'words': words})




class IndexView(generic.ListView):
    template_name = 'words/index.html'
    context_object_name = 'latest_words_list'

    def get_queryset(self):
        """Return the last five published questions."""
        return Words.objects.order_by('-puntos')[:2]


class DetailView(generic.DetailView):
    model = Words
    template_name = 'words/detail.html'


class ResultsView(generic.DetailView):
    model = Words
    template_name = 'words/results.html'
'''
