
import { BrowserModule, Title } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ServiceWorkerModule } from '@angular/service-worker';
import { environment } from '../environments/environment';

// Application modules
import { HomeModule } from './pages/home/home.module';
import { BunsModule } from './pages/buns/buns.module';
import { AuthModule } from './pages/auth/auth.module';
import { NavComponent } from './layout/nav/nav.component';
import { HttpErrorHandler } from './shared/_services/http-handle-error.service';

import { AppHttpInterceptorService } from './shared/_services/app-http-interceptor.service';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

//use 
//ServiceWorkerModule.register('/ngsw-worker.js', { enabled: environment.production }),
//...if you only want pwa for prod build

@NgModule({
  declarations: [
    AppComponent,
    NavComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    HomeModule,
    BunsModule,
    AuthModule,
    ServiceWorkerModule.register('/ngsw-worker.js', { enabled: true/*environment.production*/ }),
    NgbModule.forRoot()
  ],
  providers: [
    Title,
    HttpErrorHandler,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: AppHttpInterceptorService ,
      multi: true
    }
  ],

  bootstrap: [AppComponent],
})
export class AppModule { }
