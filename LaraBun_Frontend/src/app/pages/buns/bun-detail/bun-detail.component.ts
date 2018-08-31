import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

//  App imports
import { Bun } from '../bun';
import { BunsService } from '../_services/buns.service';
import { AuthService } from '../../auth/_services/auth.service';

@Component({
  selector: 'app-bun-detail',
  templateUrl: './bun-detail.component.html',
  styleUrls: ['./bun-detail.component.scss']
})
export class BunDetailComponent implements OnInit {

  bun: Bun;
  isLoading: Boolean = false;
  userVote: number;

  constructor(
    private bunService: BunsService,
    private route: ActivatedRoute,
    private auth: AuthService ) {}

  ngOnInit() {
    // Get bun details
    this.getBunDetail();
  }

  getBunDetail(): void {
    this.isLoading = true;
    const id = +this.route.snapshot.paramMap.get('id');
    this.bunService.getBunDetail(id)
      .subscribe(bun => {
        this.isLoading = false;
        this.bun = bun['data'];
      });
  }

  onVote(rating: number, id: number): void {
    // Check if user already vote on a bun
    if (this.checkUserVote(this.bun.ratings)) {
      alert('you already vote on this bun');  //TODO: make it nicer!
      return;
    }
    //  Get bun id
    id = +this.route.snapshot.paramMap.get('id');
    // post vote
    this.bunService.voteOnBun(rating, id)
      .subscribe(
        (response) => {
          this.userVote = response.data.rating;
          // Update the average rating and rating object on bun
          this.bun['average_rating'] = response.data.average_rating;
          //  Update ratings array
          this.bun.ratings.push(response.data);
        }
      );
  }

  checkUserVote(ratings: any[]): Boolean {
    const currentUserId = this.auth.currentUser.id;
    let ratingUserId: number;
    Object.keys(ratings).forEach( (i) => {
      ratingUserId = ratings[i].user_id;
    });
    if ( currentUserId === ratingUserId ) {
      return true;
    } else {
      return false;
    }
  }

  onSubmit(bun) {
    this.isLoading = true;
    const id = +this.route.snapshot.paramMap.get('id');
    this.bunService.updateBun(id, bun.value)
      .subscribe(response => {
        this.isLoading = false;
        this.bun = response['data'];
      });
  }

  checkBunOwner(): Boolean {
    if (this.auth.currentUser.id === this.bun.user.id) {
      return true;
    } else {
      return false;
    }
  }

}
