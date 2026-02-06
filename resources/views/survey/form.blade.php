@php
    $event  = $registration->event;
    $survey = $event?->survey;
@endphp

<style>
    .survey-card {
        max-width: 720px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .survey-title {
        text-align: center;
        font-weight: 700;
        margin-bottom: 25px;
        color: #212529;
    }

    .survey-question {
        margin-bottom: 25px;
    }

    .survey-question p {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .survey-question input[type="text"] {
        width: 100%;
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #ced4da;
    }

    .survey-options label {
        display: block;
        margin-bottom: 6px;
        cursor: pointer;
    }

    .survey-options input {
        margin-right: 6px;
    }

    .submit-btn {
        margin-top: 20px;
        padding: 10px 30px;
        background-color: #0d6efd;
        border: none;
        color: #fff;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #0b5ed7;
    }

    .survey-error {
        text-align: center;
        color: #dc3545;
        font-weight: 600;
    }
</style>

<div class="survey-card">

    {{-- Survey Title --}}
    @if($survey)
        <h3 class="survey-title">{{ $survey->title }}</h3>
    @endif

    <form method="POST" action="{{ url('/survey-submit') }}">
        @csrf

        <input type="hidden"
               name="registration_id"
               value="{{ $registration->id }}">

        @if($survey && $survey->questions && $survey->questions->count())

            @foreach($survey->questions as $q)

                <div class="survey-question">
                    <p>{{ $q->question }}</p>

                    {{-- TEXT QUESTION --}}
                    @if($q->type === 'text')
                        <input type="text"
                               name="answers[{{ $q->id }}]"
                               required>

                    {{-- MCQ QUESTION --}}
                    @elseif($q->type === 'mcq')
                        @php
                            $options = is_array($q->options)
                                ? $q->options
                                : json_decode($q->options, true);
                        @endphp

                        @if(is_array($options))
                            <div class="survey-options">
                                @foreach($options as $opt)
                                    <label>
                                        <input type="radio"
                                            name="answers[{{ $q->id }}]"
                                            value="{{ $opt }}"
                                            required>
                                        {{ $opt }}
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>

            @endforeach

            <div class="text-center">
                <button type="submit" class="submit-btn">
                    Submit Survey
                </button>
            </div>

        @else
            <p class="survey-error">
                ❌ Survey or questions not available for this event.
            </p>
        @endif

    </form>
</div>
