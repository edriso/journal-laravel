<?php
namespace Tests\Feature;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class PostOwnershipTest extends TestCase
{
 use RefreshDatabase;
 public function test_posts_and_comments_are_owned_by_the_authenticated_author(): void
 {
  $owner=User::factory()->create();$other=User::factory()->create();
  $this->actingAs($owner)->post('/posts',['title'=>'Example post','content'=>'A useful example article.','author_id'=>$other->id])->assertRedirect(route('posts.index'));
  $post=Post::firstOrFail();
  $this->assertSame($owner->id,$post->user_id);
  $this->post('/comments',['text'=>'Example comment','postId'=>$post->id])->assertRedirect();
  $comment=Comment::firstOrFail();
  $this->actingAs($other)->put('/posts/'.$post->id,['title'=>'Changed','content'=>'Changed article content.'])->assertForbidden();
  $this->delete('/posts/'.$post->id)->assertForbidden();
  $this->delete('/comments/'.$comment->id)->assertForbidden();
  $this->assertDatabaseHas('posts',['id'=>$post->id,'title'=>'Example post']);
  $this->actingAs($owner)->delete('/comments/'.$comment->id)->assertRedirect();
  $this->delete('/posts/'.$post->id)->assertRedirect();
  $this->assertDatabaseCount('posts',0);
 }
}
