import {Component, Input,EventEmitter, OnInit, Output} from '@angular/core';
import {DataGetterService, Fish} from '../../service/data-getter.service';
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-fish-new',
  templateUrl: './fish-new.component.html',
  styleUrls: ['./fish-new.component.scss'],
})
export class FishNewComponent implements OnInit {
  @Input() fish: Fish;
  @Input() isNew: boolean;
  @Output() addFish=new EventEmitter();
  @Output() cancelAddingFish=new EventEmitter();
  title: string;
  constructor(private dataGetter: DataGetterService,private route: ActivatedRoute) {

  }

  ngOnInit() {
    if(this.isNew){
      this.fish={
        id:null,
        nameOfType:'',
        amount:null,
        // eslint-disable-next-line @typescript-eslint/naming-convention
        aquarium_id:null
      };
      this.title='New Fishs';
    }
  }
  addNew(){
    if(this.isNew){
      this.fish.aquarium_id=+this.route.snapshot.paramMap.get('numb');
      this.addFish.emit(this.fish);
    }
  }
  cancelAdding(){
    if(this.isNew){
      this.cancelAddingFish.emit();
    }
  }
  saveFish(){
    this.dataGetter.editFish(this.fish).subscribe(
      data=>console.log(data)
    );
  }

}
