import { Component, OnInit } from '@angular/core';

// App imports
import { Bun } from '../bun';
import { BunsService } from '../_services/buns.service';

@Component({
  selector: 'app-bun-list',
  templateUrl: './bun-list.component.html',
  styleUrls: ['./bun-list.component.scss']
})
export class BunListComponent implements OnInit {
  // Using Bun Model class
  buns: Bun[];
  isLoading: Boolean = false;
  public searchText: string;

  constructor(
    private bunService: BunsService) {}

  ngOnInit() {
    // Get bun list
    this.getBuns();
  }

  getBuns(): void {
    this.isLoading = true;
    this.bunService.getBuns()
      .subscribe(
        response => this.handleResponse(response),
        error => this.handleError(error));
  }

  protected handleResponse(response: Bun[]) {
    this.isLoading = false,
    this.buns = response;
  }
  protected handleError(error: any) {
    this.isLoading = false,
    console.error(error);
  }
}
