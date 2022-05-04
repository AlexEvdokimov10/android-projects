import {Component, EventEmitter, OnInit, Output} from '@angular/core';

@Component({
  selector: 'app-new-aquarium',
  templateUrl: './new-aquarium.component.html',
  styleUrls: ['./new-aquarium.component.scss']
})
export class NewAquariumComponent implements OnInit {

  @Output() aquarium=new EventEmitter();
  showForm=false;
  constructor() { }

  ngOnInit(): void {

  }
  onSubmit(myForm:any){
    const fields=myForm.form.controls;
    this.showForm=false;
    this.aquarium.emit(
      {
        number:fields.number.value,
        form:fields.form.value,
        size:fields.size.value,
        isBackLight:fields.isBackLight.value
      }
    )
  }

}
