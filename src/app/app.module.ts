import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PedidosModule } from './_modules/pedidos/pedidos.module';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    PedidosModule,

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
