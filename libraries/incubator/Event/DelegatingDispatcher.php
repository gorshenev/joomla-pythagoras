<?php
/**
 * Part of the Joomla Framework Event Package
 *
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Event;

/**
 * A dispatcher delegating its methods to another dispatcher.
 *
 * @since  1.0
 */
final class DelegatingDispatcher implements DispatcherInterface
{
	/**
	 * The delegated dispatcher.
	 *
	 * @var    DispatcherInterface
	 * @since  1.0
	 */
	private $dispatcher;

	/**
	 * Constructor.
	 *
	 * @param   DispatcherInterface $dispatcher The delegated dispatcher.
	 *
	 * @since   1.0
	 */
	public function __construct(DispatcherInterface $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Attaches a listener to an event
	 *
	 * @param   string   $eventName The event to listen to.
	 * @param   callable $callback  A callable function
	 * @param   integer  $priority  The priority at which the $callback executed
	 *
	 * @return  boolean
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function addListener($eventName, callable $callback, $priority = 0)
	{
		return $this->dispatcher->addListener($eventName, $callback, $priority);
	}

	/**
	 * Removes an event listener from the specified event.
	 *
	 * @param   string   $eventName The event to remove a listener from.
	 * @param   callable $listener  The listener to remove.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function removeListener($eventName, callable $listener)
	{
		$this->dispatcher->removeListener($eventName, $listener);
	}

	/**
	 * Trigger an event.
	 *
	 * @param   EventInterface|string $event The event object or name.
	 *
	 * @return  EventInterface  The event after being passed through all listeners.
	 *
	 * @since       1.0
	 * @deprecated  3.0  Use dispatch() instead.
	 */
	public function triggerEvent($event)
	{
		if (!($event instanceof EventInterface))
		{
			$event = new Event($event);
		}

		return $this->dispatch($event);
	}

	/**
	 * Dispatches an event to all registered listeners.
	 *
	 * @param   EventInterface $event The event to pass to the event handlers/listeners.
	 *
	 * @return  EventInterface  The event after being passed through all listeners.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function dispatch(EventInterface $event)
	{
		return $this->dispatcher->dispatch($event);
	}
}
