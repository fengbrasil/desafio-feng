import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DataTableComponent } from './datatable.component';
import { GridModule } from '@progress/kendo-angular-grid';
import { NgxLoadingModule } from 'ngx-loading';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
    NgxLoadingModule.forRoot({})
  ],
  declarations: [DataTableComponent],
  exports: [DataTableComponent]
})
export class DataTableModule { }
