@extends('layouts.app')

@section('content')

    <h1 align="center" class="mt-3 mb-3">Create a Job Listing</h1>
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Enter Listing Details</strong></div>
                <form class="form-horizontal" method="POST" action="{{ route('jobPosts-create') }}">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="title"
                               class="col-md-4 col-form-label text-md-right">{{('Title / Position')}}</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                   class="form-control @error('title') is-invalid @enderror" name="title"
                                   value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="organisation"
                               class="col-md-4 col-form-label text-md-right">{{('Organisation')}}</label>

                        <div class="col-md-6">
                            <input id="organisation" type="text"
                                   class="form-control @error('organisation') is-invalid @enderror" name="organisation"
                                   value="{{ old('organisation') }}" required autocomplete="organisation" autofocus>

                            @error('organisation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{('Contact E-mail')}}</label>

                        <div class="col-md-6">
                            <input id="email" type="text"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="estSalary"
                               class="col-md-4 col-form-label text-md-right">{{('Estimated Yearly Salary')}}</label>

                        <div class="col-md-6">
                            <input id="estSalary" type="text"
                                   class="form-control @error('estSalary') is-invalid @enderror" name="estSalary"
                                   value="{{ old('estSalary') }}" required autocomplete="estSalary" autofocus>

                            @error('estSalary')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5 align="center">Location Details</h5>


                    <!-- State -->
                    <div class="form-group row{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 col-form-label text-md-right">State/Territory</label>

                        <div class="col-md-6">
                            <select id="state" name="state" class="form-control" value="{{ old('state') }}"
                                    required>
                                <option disabled selected value>Select State</option>
                                <option value="NSW">New South Wales</option>
                                <option value="ACT">Australian Capital Territory</option>
                                <option value="VIC">Victoria</option>
                                <option value="QLD">Queensland</option>
                                <option value="SA">South Australia</option>
                                <option value="WA">Western Australia</option>
                                <option value="NT">Northern Territory</option>
                                <option value="TAS">Tasmania</option>
                            </select>

                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <!-- City -->
                    <div class="form-group row{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control" name="city" pattern="[a-zA-Z ]+"
                                   value="{{ old('city') }}" required>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <hr>
                    <h5 align="center">Experience Requirements</h5>

                    <!-- Education -->
                    <div class="form-group row{{ $errors->has('minEdu') ? ' has-error' : '' }}">
                        <label for="minEdu" class="col-md-4 col-form-label text-md-right">Minimum Education</label>

                        <div class="col-md-6">
                            <select id="minEdu" name="minEdu" class="form-control"
                                    value="{{ old('minEdu') }}" required>
                                <option disabled selected value>Select Education
                                </option>
                                <option value="1">Cert I</option>
                                <option value="2">Cert II</option>
                                <option value="3">Cert III</option>
                                <option value="4">Cert IV</option>
                                <option value="5">Diploma</option>
                                <option value="6">Associate degree / Advanced Diploma</option>
                                <option value="7">Bachelor degree</option>
                                <option value="8">Bachelor Honors degree</option>
                                <option value="9">Masters degree</option>
                                <option value="10">PhD / Doctoral degree</option>
                                <option value="0">Not Applicable / None</option>
                            </select>

                            @if ($errors->has('minEdu'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('minEdu') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="form-group row{{ $errors->has('minExp') ? ' has-error' : '' }}">
                        <label for="minExp" class="col-md-4 col-form-label text-md-right">Industry Experience
                            (years)</label>

                        <div class="col-md-6">
                            <input id="minExp" type="number" min="0" max="60" class="form-control"
                                   name="minExp" value="{{ old('minExp') }}" required>

                            @if ($errors->has('minExp'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('minExp') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <h5 align="center">Programming and Scripting Languages</h5>

                    <div class="checkbox-container">
                        <!-- Bash -->
                        <div class="{{ $errors->has('bash') ? ' has-error' : '' }}">
                            <label for="bash" class="label.mdl-checkbox">Bash</label>

                            <div>
                                <input id="bash-hidden" type="hidden" class="" name="bash"
                                       value="0">
                                <input id="bash" type="checkbox" class="" name="bash"
                                       value="{{ old('bash', 1) }}">

                                @if ($errors->has('bash'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bash') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- C -->
                        <div class="{{ $errors->has('c') ? ' has-error' : '' }}">
                            <label for="c" class="label.mdl-checkbox">C</label>

                            <div>
                                <input id="c-hidden" type="hidden" class="" name="c" value="0">
                                <input id="c" type="checkbox" class="" name="c"
                                       value="{{ old('c', 1) }}">

                                @if ($errors->has('c'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- C# -->
                        <div class="{{ $errors->has('csharp') ? ' has-error' : '' }}">
                            <label for="csharp" class="label.mdl-checkbox">C#</label>

                            <div>
                                <input id="csharp-hidden" type="hidden" class="" name="csharp" value="0">
                                <input id="csharp" type="checkbox" class="" name="csharp"
                                       value="{{ old('c#', 1) }}">

                                @if ($errors->has('csharp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('csharp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- C++ -->
                        <div class="{{ $errors->has('cplus') ? ' has-error' : '' }}">
                            <label for="cplus" class="label.mdl-checkbox">C++</label>

                            <div>
                                <input id="cplus-hidden" type="hidden" class="" name="cplus" value="0">
                                <input id="cplus" type="checkbox" class="" name="cplus"
                                       value="{{ old('cplus', 1) }}">

                                @if ($errors->has('cplus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cplus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- CSS -->
                        <div class="{{ $errors->has('css') ? ' has-error' : '' }}">
                            <label for="css" class="label.mdl-checkbox">CSS</label>

                            <div>
                                <input id="css-hidden" type="hidden" class="" name="css" value="0">
                                <input id="css" type="checkbox" class="" name="css"
                                       value="{{ old('css', 1) }}">

                                @if ($errors->has('css'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('css') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- HTML -->
                        <div class="{{ $errors->has('html') ? ' has-error' : '' }}">
                            <label for="html" class="label.mdl-checkbox">HTML</label>

                            <div>
                                <input id="html-hidden" type="hidden" class="" name="html"
                                       value="0">
                                <input id="html" type="checkbox" class="" name="html"
                                       value="{{ old('html', 1) }}">

                                @if ($errors->has('html'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('html') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Java -->
                        <div class="{{ $errors->has('java') ? ' has-error' : '' }}">
                            <label for="java" class="label.mdl-checkbox">Java</label>

                            <div>
                                <input id="java-hidden" type="hidden" class="" name="java"
                                       value="0">
                                <input id="java" type="checkbox" class="" name="java"
                                       value="{{ old('java', 1) }}">

                                @if ($errors->has('java'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('java') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- JavaScript -->
                        <div class="{{ $errors->has('javascript') ? ' has-error' : '' }}">
                            <label for="javascript" class="label.mdl-checkbox">JavaScript</label>

                            <div>
                                <input id="javascript-hidden" type="hidden" class=""
                                       name="javascript"
                                       value="0">
                                <input id="javascript" type="checkbox" class="" name="javascript"
                                       value="{{ old('javascript', 1) }}">

                                @if ($errors->has('javascript'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('javascript') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- PowerShell -->
                        <div class="{{ $errors->has('powershell') ? ' has-error' : '' }}">
                            <label for="powershell" class="label.mdl-checkbox">PowerShell</label>

                            <div>
                                <input id="powershell-hidden" type="hidden" class=""
                                       name="powershell"
                                       value="0">
                                <input id="powershell" type="checkbox" class="" name="powershell"
                                       value="{{ old('powershell', 1) }}">

                                @if ($errors->has('powershell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('powershell') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- PHP -->
                        <div class="{{ $errors->has('php') ? ' has-error' : '' }}">
                            <label for="php" class="label.mdl-checkbox">PHP</label>

                            <div>
                                <input id="php-hidden" type="hidden" class="" name="php" value="0">
                                <input id="php" type="checkbox" class="" name="php"
                                       value="{{ old('php', 1) }}">

                                @if ($errors->has('php'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('php') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Python -->
                        <div class="{{ $errors->has('python') ? ' has-error' : '' }}">
                            <label for="python" class="label.mdl-checkbox">Python</label>

                            <div>
                                <input id="python-hidden" type="hidden" class="" name="python"
                                       value="0">
                                <input id="python" type="checkbox" class="" name="python"
                                       value="{{ old('python', 1) }}">

                                @if ($errors->has('python'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('python') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Ruby -->
                        <div class="{{ $errors->has('ruby') ? ' has-error' : '' }}">
                            <label for="ruby" class="label.mdl-checkbox">Ruby</label>

                            <div>
                                <input id="ruby-hidden" type="hidden" class="" name="ruby"
                                       value="0">
                                <input id="ruby" type="checkbox" class="" name="ruby"
                                       value="{{ old('ruby', 1) }}">

                                @if ($errors->has('ruby'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ruby') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Rust -->
                        <div class="{{ $errors->has('rust') ? ' has-error' : '' }}">
                            <label for="rust" class="label.mdl-checkbox">Rust</label>

                            <div>
                                <input id="rust-hidden" type="hidden" class="" name="rust"
                                       value="0">
                                <input id="rust" type="checkbox" class="" name="rust"
                                       value="{{ old('rust', 1) }}">

                                @if ($errors->has('rust'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rust') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- SQL -->
                        <div class="{{ $errors->has('sql') ? ' has-error' : '' }}">
                            <label for="sql" class="label.mdl-checkbox">SQL</label>

                            <div>
                                <input id="sql-hidden" type="hidden" name="sql" value="0">
                                <input id="sql" type="checkbox" name="sql"
                                       value="{{ old('sql', 1) }}">

                                @if ($errors->has('sql'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sql') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <hr>
                    <h5 align="center">Operating Systems</h5>

                    <div class="checkbox-container">
                        <!-- Linux -->
                        <div class="{{ $errors->has('linux') ? ' has-error' : '' }}">
                            <label for="linux" class="label.mdl-checkbox">Linux</label>

                            <div>
                                <input id="linux-hidden" type="hidden" name="linux"
                                       value="0">
                                <input id="linux" type="checkbox" name="linux"
                                       value="{{ old('linux', 1) }}">

                                @if ($errors->has('linux'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linux') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- OS X  -->
                        <div class="{{ $errors->has('macOS') ? ' has-error' : '' }}">
                            <label for="macOS" class="label.mdl-checkbox">MacOS</label>

                            <div>
                                <input id="macOS-hidden" type="hidden" name="macOS"
                                       value="0">
                                <input id="macOS" type="checkbox" name="macOS"
                                       value="{{ old('macOS', 1) }}">

                                @if ($errors->has('macOS'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('macOS') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Android -->
                        <div class="{{ $errors->has('android') ? ' has-error' : '' }}">
                            <label for="android" class="label.mdl-checkbox">Android</label>

                            <div>
                                <input id="android-hidden" type="hidden" name="android"
                                       value="0">
                                <input id="android" type="checkbox" name="android"
                                       value="{{ old('android', 1) }}">

                                @if ($errors->has('android'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('android') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- iOS -->
                        <div class="{{ $errors->has('iOS') ? ' has-error' : '' }}">
                            <label for="iOS" class="label.mdl-checkbox">iOS</label>

                            <div>
                                <input id="iOS-hidden" type="hidden" name="iOS"
                                       value="0">
                                <input id="iOS" type="checkbox" name="iOS"
                                       value="{{ old('iOS', 1) }}">

                                @if ($errors->has('iOS'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iOS') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Unix -->
                        <div class="{{ $errors->has('unix') ? ' has-error' : '' }}">
                            <label for="unix" class="label.mdl-checkbox">Unix</label>

                            <div>
                                <input id="unix-hidden" type="hidden" name="unix"
                                       value="0">
                                <input id="unix" type="checkbox" name="unix"
                                       value="{{ old('unix', 1) }}">

                                @if ($errors->has('unix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Windows 10 -->
                        <div class="{{ $errors->has('windows10') ? ' has-error' : '' }}">
                            <label for="windows10" class="label.mdl-checkbox">Windows 10</label>

                            <div>
                                <input id="windows10-hidden" type="hidden" name="windows10"
                                       value="0">
                                <input id="windows10" type="checkbox" name="windows10"
                                       value="{{ old('windows10', 1) }}">

                                @if ($errors->has('windows10'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('windows10') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Windows 7 -->
                        <div class="{{ $errors->has('windows7') ? ' has-error' : '' }}">
                            <label for="windows7" class="label.mdl-checkbox">Windows 7</label>

                            <div>
                                <input id="windows7-hidden" type="hidden" name="windows7"
                                       value="0">
                                <input id="windows7" type="checkbox" name="windows7"
                                       value="{{ old('windows7', 1) }}">

                                @if ($errors->has('windows7'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('windows7') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Legacy Windows -->
                        <div class="{{ $errors->has('windowsOld') ? ' has-error' : '' }}">
                            <label for="windowsOld" class="label.mdl-checkbox">Legacy Windows</label>

                            <div>
                                <input id="windowsOld-hidden" type="hidden" name="windowsOld"
                                       value="0">
                                <input id="windowsOld" type="checkbox" name="windowsOld"
                                       value="{{ old('windowsOld', 1) }}">

                                @if ($errors->has('windowsOld'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('windowsOld') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Windows Server -->
                        <div class="{{ $errors->has('windowsServer') ? ' has-error' : '' }}">
                            <label for="windowsServer" class="label.mdl-checkbox">Windows Server</label>

                            <div>
                                <input id="windowsServer-hidden" type="hidden"
                                       name="windowsServer" value="0">
                                <input id="windowsServer" type="checkbox" name="windowsServer"
                                       value="{{ old('windowsServer', 1) }}">

                                @if ($errors->has('windowsServer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('windowsServer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h5 align="center">Software</h5>

                    <div class="checkbox-container">

                        <!-- Microsoft Office -->
                        <div class="{{ $errors->has('microsoftOffice') ? ' has-error' : '' }}">
                            <label for="microsoftOffice" class="label.mdl-checkbox">Microsoft Office</label>

                            <div>
                                <input id="microsoftOffice-hidden" type="hidden"
                                       name="microsoftOffice" value="0">
                                <input id="microsoftOffice" type="checkbox"
                                       name="microsoftOffice" value="{{ old('microsoftOffice', 1) }}">

                                @if ($errors->has('microsoftOffice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('microsoftOffice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Adobe Suite -->
                        <div class="{{ $errors->has('adobe') ? ' has-error' : '' }}">
                            <label for="adobe" class="label.mdl-checkbox">Creative Cloud</label>

                            <div>
                                <input id="adobe-hidden" type="hidden" name="adobe"
                                       value="0">
                                <input id="adobe" type="checkbox" name="adobe"
                                       value="{{ old('adobe', 1) }}">

                                @if ($errors->has('adobe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adobe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5 align="center">Other Skills</h5>

                    <div class="checkbox-container">

                        <!-- Cisco Networking -->
                        <div class="{{ $errors->has('ciscoSystems') ? ' has-error' : '' }}">
                            <label for="ciscoSystems" class="label.mdl-checkbox">Cisco Networking</label>

                            <div>
                                <input id="ciscoSystems-hidden" type="hidden" name="ciscoSystems"
                                       value="0">
                                <input id="ciscoSystems" type="checkbox" name="ciscoSystems"
                                       value="{{ old('ciscoSystems', 1) }}">

                                @if ($errors->has('ciscoSystems'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ciscoSystems') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Cloud Computing -->
                        <div class="{{ $errors->has('cloud') ? ' has-error' : '' }}">
                            <label for="cloud" class="label.mdl-checkbox">Cloud Computing</label>

                            <div>
                                <input id="cloud-hidden" type="hidden" name="cloud"
                                       value="0">
                                <input id="cloud" type="checkbox" name="cloud"
                                       value="{{ old('cloud', 1) }}">

                                @if ($errors->has('cloud'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cloud') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 align="center">Other Details</h4>
                    <hr>

                    <label for="description" class="col-md-4 col-form-label">{{('Description')}}</label>


                    <div class="col-md-6">
                            <textarea id="description" type="text"
                                      class="form-control @error('description') is-invalid @enderror" name="description"
                                      value="{{ old('description') }}" required autocomplete="description" autofocus>
                            </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="align: center">
                            {{ __('Create Listing') }}
                        </button>

                        <a href="/jobPosts" class="btn btn-outline-dark mt-3 mb-3">Back</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection

